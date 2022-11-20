<?php echo view('Views/common/head'); ?>
<?php echo view('Views/common/header'); ?>


<div class="container">

  <h2 class="text-center">
    Music
  </h2>

</div>

<table id="music" class="table table-bordered">
  <thead>
    <tr>
      <th>Artist</th>
      <th>Length</th>
      <th>Title</th>
      <th>Album</th>
      <th>Genre</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($music): ?>
    <?php foreach ($music as $song): ?>
    <tr>
      <td>
        <?php echo $song->artist ?>
      </td>
      <td>
        <?php echo $song->length ?>
      </td>
      <td>
        <?php echo $song->title ?>
      </td>
      <td>
        <?php echo $song->album ?>
      </td>
      <td>
        <?php echo $song->genre ?>
      </td>
    </tr>
    <?php endforeach; ?>
    <?php endif; ?>
  </tbody>
  <tfoot>
    <tr>
      <th>Artist</th>
      <th>Length</th>
      <th>Title</th>
      <th>Album</th>
      <th>Genre</th>
    </tr>
  </tfoot>
</table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function () {
    $('#music').DataTable();
  });
</script>


</div>
<?php echo view('Views/common/tail'); ?>
