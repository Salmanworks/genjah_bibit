<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImportProductImages extends Command
{
    protected $signature = 'import:product-images {source-folder?}';
    protected $description = 'Import product images from a folder to storage';

    public function handle()
    {
        $sourceFolder = $this->argument('source-folder') ?? public_path('images/products');
        
        $this->info("Importing images from: {$sourceFolder}");
        
        if (!File::exists($sourceFolder)) {
            $this->error("Source folder not found: {$sourceFolder}");
            return 1;
        }

        $files = File::files($sourceFolder);
        
        if (empty($files)) {
            $this->warn("No images found in source folder");
            return 0;
        }

        $this->info("Found " . count($files) . " image(s)");
        
        $imported = 0;
        $skipped = 0;

        foreach ($files as $file) {
            $fileName = $file->getFilename();
            $fileExtension = $file->getExtension();
            
            // Skip if not an image
            if (!in_array($fileExtension, ['jpg', 'jpeg', 'png', 'webp'])) {
                $this->warn("Skipping non-image file: {$fileName}");
                $skipped++;
                continue;
            }

            // Try to match with product
            $baseName = str_replace(['.' . $fileExtension, '-1', '-2'], '', $fileName);
            $product = Product::where('slug', $baseName)
                ->orWhere('name', 'like', '%' . str_replace(['bibit-', '-'], ' ', $baseName) . '%')
                ->first();

            if (!$product) {
                $this->warn("No matching product found for: {$fileName}");
                $skipped++;
                continue;
            }

            // Determine if main image or gallery
            if (str_contains($fileName, '-1') || str_contains($fileName, '-2')) {
                // Gallery image
                $galleryImages = $product->gallery_images ?? [];
                $newImagePath = 'products/' . $fileName;
                
                // Copy to storage
                $storagePath = storage_path('app/public/' . $newImagePath);
                File::copy($file->getPathname(), $storagePath);
                
                if (!in_array($newImagePath, $galleryImages)) {
                    $galleryImages[] = $newImagePath;
                    $product->gallery_images = $galleryImages;
                    $product->save();
                    $this->info("✓ Added gallery image for: {$product->name}");
                    $imported++;
                } else {
                    $this->warn("Gallery image already exists for: {$product->name}");
                    $skipped++;
                }
            } else {
                // Main image
                $newImagePath = 'products/' . $fileName;
                
                // Delete old image if exists
                if ($product->main_image && Storage::disk('public')->exists($product->main_image)) {
                    Storage::disk('public')->delete($product->main_image);
                }
                
                // Copy to storage
                $storagePath = storage_path('app/public/' . $newImagePath);
                File::copy($file->getPathname(), $storagePath);
                
                $product->main_image = $newImagePath;
                $product->save();
                
                $this->info("✓ Updated main image for: {$product->name}");
                $imported++;
            }
        }

        $this->newLine();
        $this->info("Import completed!");
        $this->info("Imported: {$imported}");
        $this->info("Skipped: {$skipped}");

        return 0;
    }
}
