<?php

    namespace App\Enums;

    enum MessageType: string
    {
        case CREATED = "Berhasil Menambahkan";

        case UPDATED = "Berhasil Memperbarui";

        case DELETED = "Berhasil Menghapus";

        case ERROR = "Terjadi kesalahan. Silahkan coba lagi";

        public function message(string $entity = '', ?string $error = null): string
        {
            if ($this === MessageType::ERROR && $error) {
                return "{$this->value} {$error}";
            }

            return "{$this->value} {$entity}";
        }
    }

    $message = MessageType::CREATED->message('Buku');
    echo $message . PHP_EOL;
    $message = MessageType::UPDATED->message('Buku');
    echo $message . PHP_EOL;

    $message = MessageType::DELETED->message('Buku');
    echo $message . PHP_EOL;

    $message = MessageType::ERROR->message();
    echo $message; // Output: Terjadi kesalahan. Silahkan coba lagi Koneksi database terputus
?>
