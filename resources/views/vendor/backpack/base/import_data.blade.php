@extends(backpack_view('blank')) @section('content') <div class="row">
    <div class="col-sm-6 col-md-4">
        <div class="card">
            <div class="card-header">Importa date din fisier excell</div>
            <div class="card-body">
                <form action="" method="POST" role="form" data-toggle="validator" enctype="multipart/form-data">
                     @csrf
                    <div class="form-group col-md-12">

                        <label for="ImportFile">Alege fisier date</label>
                        <input class="form-control" required=""  name="contractExcelFile" type="file" >
                    </div>

                    <div class="form-group col-md-12">
                    <select class="form-control" required="" id="language" name="language">
                        <option value="ro">ro</option>
                        <option value="en">en</option>
                        <option value="es">es</option>
                        <option value="fr">fr</option>
                        <option value="it">it</option>
                        <option value="de">de</option>
                    </select>
                    </div>
                    <ul>
                        <li>Se accepta doar fisiere excell cu extensia .xls</li>
                        <li>Toate coloanele sa fie formatate ca text general si fara formule.</li>
                    </ul>
                    <input class="pull-right btn btn-primary" type="submit" value="Importa">
                </form>
            </div>
        </div>
    </div>
</div> @endsection
