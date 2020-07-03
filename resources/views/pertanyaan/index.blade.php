@extends('adminlte.master')

@section('content')
<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pertanyaan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/pertanyaan/create">Buat Pertanyaan</a></li>
              <li class="breadcrumb-item active">Data Pertanyaan</li>
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
                <h3 class="card-title">Tabel Pertanyaan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">No.</th>
                      <th style="width: 245px">Judul</th>
                      <th>Isi</th>
                      <th>Jawab</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($pertanyaan as $key => $item)
                    <tr>
                        <td> {{ $item->id }} </td>
                        <td>  <a href="/jawaban/{{ $item->id }}">{{ $item->judul }}</a>  </td>
                        <td> {{ $item->isi }} </td>
                        <td class="d-flex justify-content-center">
                          <!-- Modal Bootstrap -->
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-pertanyaan="{{ $item->isi }}"  data-path="/jawaban/{{ $item->id }}" data-target="#jawab"><i class="fas fa-plus-circle"></i></button>
                          <div class="modal fade" id="jawab" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Form Jawaban</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <h3></h3>
                                  <!-- Form Jawaban -->
                                  <form role="form" action="/jawaban/{{$item->id}}" method="post">
                                  @csrf
                                    <div class="form-group">
                                      <label for="message-text" class="col-form-label">Jawaban:</label>
                                      <textarea name="isi" class="form-control" id="message-text"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary">Jawab</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
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

@push('scripts')
  $('#jawab').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var path = button.data('path')
    var pertanyaan = button.data('pertanyaan') 
    var modal = $(this)

    modal.find('.modal-body form').attr("action", path)
    modal.find('.modal-body h3').html(pertanyaan)
  })
@endpush