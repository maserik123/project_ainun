<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
 

    <!-- <title><?= $title; ?></title> -->
  </head>
  <body>
    <div class="container">
        <div class="row mt-2">
            <div class="col-12">

                <div class="card mt-2">
                    <div class="card-body">
                    <h1 class="display-4">Data Perceraian</h1>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Jenis Perkara</th>
                                <th scope="col">Usia Suami</th>
                                <th scope="col">Usia Istri</th>
                                <th scope="col">Kecamatan</th>
                                <th scope="col">Penyebab</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;
                                 foreach ($semuaPerceraian as $cerai) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $cerai['waktu_full']; ?></td>
                                    <td><?= $cerai['jenis_perkara']; ?></td>
                                    <td><?= $cerai['usia_suami']; ?></td>
                                    <td><?= $cerai['usia_istri']; ?></td>
                                    <td><?= $cerai['kecamatan']; ?></td>
                                    <td><?= $cerai['faktor_penyebab_perceraian']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>