<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RuntimeException;

final class PublicImageStorage
{
    public const MAX_KILOBYTES = 20 * 1024;

    public static function store(
        UploadedFile $image,
        string $directory,
        string $label,
        int|string $recordId,
        int $slugLength = 30,
    ): string {
        $slug = Str::limit(Str::slug($label), $slugLength, '') ?: 'imagem';
        $extension = strtolower($image->extension() ?: $image->getClientOriginalExtension());
        $filename = $slug.'_'.((string) $recordId).'_'.Str::lower(Str::random(6)).'.'.$extension;
        $path = $image->storeAs(trim($directory, '/'), $filename, 'public');

        if (! is_string($path)) {
            throw new RuntimeException('Não foi possível salvar a imagem enviada.');
        }

        return $path;
    }

    public static function delete(?string $path, string $directory): void
    {
        $normalizedPath = self::normalize($path);
        $normalizedDirectory = trim($directory, '/');

        if ($normalizedPath === null || ! str_starts_with($normalizedPath, $normalizedDirectory.'/')) {
            return;
        }

        Storage::disk('public')->delete($normalizedPath);
    }

    public static function url(
        ?string $path,
        string $fallbackAsset = 'pingo-decor/assets/imagem-indisponivel.svg',
    ): string {
        $normalizedPath = self::normalize($path);

        if ($normalizedPath === null) {
            return asset($fallbackAsset);
        }

        if (Storage::disk('public')->exists($normalizedPath)) {
            return Storage::disk('public')->url($normalizedPath);
        }

        $legacyPath = 'pingo-decor/assets/'.$normalizedPath;

        if (is_file(public_path($legacyPath))) {
            return asset($legacyPath);
        }

        return asset($fallbackAsset);
    }

    private static function normalize(?string $path): ?string
    {
        $normalizedPath = ltrim(str_replace('\\', '/', trim((string) $path)), '/');

        if ($normalizedPath === '' || str_contains($normalizedPath, '../')) {
            return null;
        }

        return $normalizedPath;
    }
}
