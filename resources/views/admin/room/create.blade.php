@extends('layouts.dashboard')

@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Add a new room</h3>
                    <p class="text-subtitle text-muted">
                        Create a fresh space with our 'Add a new room' feature, allowing you
                        to customize and expand your living area effortlessly.
                    </p>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" action="{{ route('admin.room.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="no_room">No Room</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input required type="text" id="no_room" class="form-control" name="no_room">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="publish_rate">Publish Rate</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input required type="number" id="publish_rate" class="form-control"
                                            name="publish_rate">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="type">Type Room</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <fieldset class="form-group">
                                            <select class="form-select" id="type" name="type" required>
                                                <option value="">Select room type</option>
                                                @foreach (\App\Models\Room::TYPE_MAP as $type => $name)
                                                    <option value="{{ $type }}">{{ $name }}</option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-8" id="containerImage">
                                    </div>
                                    <div>
                                        <button type="button" onclick="append_photo()" class="btn icon btn-primary">Append
                                            Photo <i data-feather="edit"></i></button>
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        function append_photo() {
            const id = (Math.random() + 1).toString(36).substring(7)
            const container = document.createElement('div');
            const fileInput = document.createElement('input');
            const preview = document.createElement('img');

            fileInput.setAttribute('type', 'file')
            fileInput.setAttribute('id', id)
            fileInput.setAttribute('name', 'photos[]')

            // preview.width = '70px'
            // preview.height = '70px'
            fileInput.onchange = (e) => {
                const file = fileInput.files[0]
                preview.src = URL.createObjectURL(file)
                fileInput.setAttribute('hidden', true)
                preview.setAttribute('widht', '70px')
                preview.setAttribute('height', '70px')
            }
            const buttonClose = document.createElement('button')
            buttonClose.onclick = () => {
                document.getElementById(id).remove()
                buttonClose.remove()
                preview.remove()
            }

            const iconClose = document.createElement('i');
            iconClose.className = 'bi bi-x'

            buttonClose.appendChild(iconClose)

            container.appendChild(preview)
            container.appendChild(fileInput)
            container.appendChild(buttonClose)

            const containerImage = document.getElementById('containerImage');
            containerImage.appendChild(container);
        }
    </script>
@endsection
