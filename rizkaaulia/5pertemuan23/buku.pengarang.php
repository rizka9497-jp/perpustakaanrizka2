<?php

// Membuat array asosiatif untuk menyimpan data buku
// Setiap elemen array memiliki 'judul' dan 'pengarang' sebagai kunci
$books = [
    [
        'judul'     => 'The Lord of the Rings',
        'pengarang' => 'J.R.R. Tolkien',
    ],
    [
        'judul'     => 'The Hitchhiker\'s Guide to the Galaxy',
        'pengarang' => 'Douglas Adams',
    ],
    [
        'judul'     => '1984',
        'pengarang' => 'George Orwell',
    ],
];
// Menampilkan data buku menggunakan perulangan foreach
echo "Daftar Buku:\n";
foreach ($books as $book) {
    echo "" . PHP_EOL;
    echo "Judul: " . $book['judul'] . PHP_EOL;
    echo "Pengarang: " . $book['pengarang'] . PHP_EOL;
}