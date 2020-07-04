@extends('adminlte.master')

@section('content')
<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ $pertanyaan[0]->judul }}</h1><br>
            <h6 style="color: grey;">Pertanyaan dibuat : {{ $pertanyaan[0]->created_at }}</h6>
            <h6 style="color: grey; line-height: 0;">Pertanyaan diperbaharui : {{ $pertanyaan[0]->updated_at }}</h6>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/pertanyaan">Data Pertanyaan</a></li>
              <li class="breadcrumb-item active">Jawaban</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">           
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> {{ $pertanyaan[0]->isi }} </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">No.</th>
                      <th>Jawaban</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1 ?>   
                    @foreach ($isi as $key)
                    <tr>
                        <td> {{ $i++ }} </td>
                        <td> {{ $key }} </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection