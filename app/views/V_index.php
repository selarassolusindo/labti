<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Import Excel</title>
    <style type="text/css">
      table {
        border-collapse: collapse;
      }
      table, td, th {
        border: 1px solid black;
      }
      form {
        margin-top: 10px;
      }
    </style>
  </head>
  <body>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>No. Induk</th>
          <th>Nama</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 0; foreach ($data as $key => $value): $no++; ?>
        <tr>
          <td><?= $no; ?></td>
          <td><?= $value['noinduk']; ?></td>
          <td><?= $value['nama']; ?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>

    <form action="<?php echo site_url('c_index/import_excel') ?>" method="post" enctype="multipart/form-data">
      <input type="file" name="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
      <button type="submit">Submit</button>
    </form>
  </body>
</html>
