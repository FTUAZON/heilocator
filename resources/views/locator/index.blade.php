@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center text-primary mb-4">State Universities and Colleges Locator</h1>

    <!-- Tab Toggle -->
    <ul class="nav nav-tabs mb-4" id="viewTabs">
        <li class="nav-item">
            <a class="nav-link active" id="listViewTab" href="#"> 
                <i class="fas fa-list"></i> List View
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="mapViewTab" href="#">
                <i class="fas fa-map-marker-alt"></i> Map View
            </a>
        </li>
    </ul>

    <div class="container">
        <!-- List View -->
        <div id="listView">
            <div class="row">
                <input 
                    type="text" 
                    id="searchInput"
                    class="form-control mb-4"
                    placeholder="Search for HEI"
                    value="{{ request('search') }}" 
                    autocomplete="off"
                />
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive" id="locatorTable">
                        @if($locators->isEmpty())
                            <p class="text-center text-danger fw-bold">
                                {{ request('search') ? "The item you searched did not bring any result." : "No records found." }}
                            </p>
                        @else
                            <table class="table table-bordered table-hover align-middle text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">HEI Name</th>
                                        <th scope="col">HEI Address</th>
                                        <th scope="col">Latitude</th>
                                        <th scope="col">Longitude</th>
                                        <th scope="col">Website</th>
                                        <th scope="col">Contact Number</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($locators as $locator)
                                        <tr>
                                            <th scope="row">{{ $locator['id'] }}</th>
                                            <td>{{ $locator['name'] }}</td>
                                            <td>{{ $locator['address'] }}</td>
                                            <td>{{ number_format($locator['latitude'], 8) }}</td>
                                            <td>{{ number_format($locator['longitude'], 8) }}</td>
                                            <td>
                                                @if($locator['website'])
                                                    <a href="{{ $locator['website'] }}" target="_blank" class="text-decoration-none">{{ $locator['website'] }}</a>
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>{{ $locator['contact_number'] }}</td>
                                            <td>
                                                <div class="d-flex justify-content-start align-items-center gap-1"> 
                                                    <button 
                                                        class="btn btn-success btn-sm edit-button" 
                                                        data-id="{{ $locator['id'] }}"
                                                        data-name="{{ $locator['name'] }}"
                                                        data-address="{{ $locator['address'] }}"
                                                        data-latitude="{{ $locator['latitude'] }}"
                                                        data-longitude="{{ $locator['longitude'] }}"
                                                        data-website="{{ $locator['website'] }}"
                                                        data-contact="{{ $locator['contact_number'] }}">
                                                        Edit
                                                    </button>
                                                    <form action="{{ route('locators.destroy', ['locator' => $locator['id']]) }}" method="POST" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Map View -->
        <div id="mapView" style="display: none;">
            <div id="map" style="height: 500px; width: 100%;"></div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit HEI</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="editName" class="form-label">HEI Name</label>
                        <input type="text" class="form-control" id="editName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editAddress" class="form-label">HEI Address</label>
                        <input type="text" class="form-control" id="editAddress" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="editLatitude" class="form-label">Latitude</label>
                        <input type="text" class="form-control" id="editLatitude" name="latitude" required>
                    </div>
                    <div class="mb-3">
                        <label for="editLongitude" class="form-label">Longitude</label>
                        <input type="text" class="form-control" id="editLongitude" name="longitude" required>
                    </div>
                    <div class="mb-3">
                        <label for="editWebsite" class="form-label">Website</label>
                        <input type="url" class="form-control" id="editWebsite" name="website">
                    </div>
                    <div class="mb-3">
                        <label for="editContact" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="editContact" name="contact_number" maxlength="11" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Toggle tabs
    const listView = document.getElementById('listView');
    const mapView = document.getElementById('mapView');
    const listViewTab = document.getElementById('listViewTab');
    const mapViewTab = document.getElementById('mapViewTab');

    listViewTab.addEventListener('click', (e) => {
        e.preventDefault();
        listView.style.display = 'block';
        mapView.style.display = 'none';
        listViewTab.classList.add('active');
        mapViewTab.classList.remove('active');
    });

    mapViewTab.addEventListener('click', (e) => {
        e.preventDefault();
        listView.style.display = 'none';
        mapView.style.display = 'block';
        mapViewTab.classList.add('active');
        listViewTab.classList.remove('active');

        setTimeout(() => {
            map.invalidateSize();
        }, 200);
    });

    // Initialize map
    var map = L.map('map').setView([6.500376731017145, 124.84356812844985], 12);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var locators = @json($locators);
    locators.forEach(function(locator) {
        if (locator.latitude && locator.longitude) {
            L.marker([locator.latitude, locator.longitude])
                .addTo(map)
                .bindTooltip('<b>' + locator.name + '</b><br>' + locator.address);
        }
    });

    // Edit button functionality
    const editButtons = document.querySelectorAll('.edit-button');
    const editForm = document.getElementById('editForm');

    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const name = this.getAttribute('data-name');
            const address = this.getAttribute('data-address');
            const latitude = this.getAttribute('data-latitude');
            const longitude = this.getAttribute('data-longitude');
            const website = this.getAttribute('data-website');
            const contact = this.getAttribute('data-contact');

            editForm.action = `/locators/${id}`;
            document.getElementById('editName').value = name;
            document.getElementById('editAddress').value = address;
            document.getElementById('editLatitude').value = latitude;
            document.getElementById('editLongitude').value = longitude;
            document.getElementById('editWebsite').value = website;
            document.getElementById('editContact').value = contact;

            new bootstrap.Modal(document.getElementById('editModal')).show();
        });
    });
</script>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
