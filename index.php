<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/init.php';

$books = getAllBooks();
$image = 'storage/book-images/book.jpg.webp';

?>

<!-- require_once header -->
<?php require_once __DIR__ . '/src/partials/header.php'; ?>
<!-- require_once header -->

<!-- main -->
<div class="container my-4">
  <div class="row justify-content-between">
    <div class="col">
      <h1>Buku kamu</h1>
    </div>
    <div class="col d-flex justify-content-end align-items-center">
      <a href="create.php" class="btn btn-primary fw-medium">
        Tambah Buku
      </a>
    </div>
  </div>

  <div class="row">
    <div class="table-responsive">
      <table class="table mt-3 table-bordered border-gray bg-white rounded-1">
        <thead class="table-dark">
          <tr class="text-center">
            <th scope="col" class="text-nowrap">No</th>
            <th scope="col" class="text-nowrap">Gambar</th>
            <th scope="col" class="text-nowrap">Judul</th>
            <th scope="col" class="text-nowrap">Aksi</th>
            <th scope="col" class="text-nowrap">Status Dibaca</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <?php if (count($books) > 0) : ?>
            <?php $index = 1 ?>
            <?php foreach ($books as $book) : ?>
              <tr class="text-center">
                <th scope="row"><?= $index ?></th>
                <td>
                  <img src="<?= $image ?>" />
                </td>
                <td><?= $book['judul_buku']; ?></td>
                <td class="d-flex gap-2 justify-content-center">
                  <a href="detail.php?book=<?= $book['slug'] ?>" class="btn btn-info">
                    <i class="bi bi-eye"></i>
                  </a>
                  <a href="" class="btn btn-success">
                    <i class="bi bi-pencil-square"></i>
                  </a>
                  <a href="" class="btn btn-danger">
                    <i class="bi bi-trash"></i>
                  </a>
                </td>
                <td><?= $book['status_dibaca'] ?></td>
              </tr>
              <?php $index++ ?>
            <?php endforeach ?>
          <?php else : ?>
            <tr>
              <td class="text-center" colspan="5">Kamu belum punya buku :(</td>
            </tr>
          <?php endif ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- end main -->

<!-- require_once footer -->
<?php require_once __DIR__ . '/src/partials/footer.php' ?>
<!-- require_once footer -->