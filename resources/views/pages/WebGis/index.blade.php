@extends('layouts.webgis')
@section('content')
<div class="m-0" id="map">
  <button id="toggleButton" class="toggleBtn btn  bg-white text-black" >Menu</button>
  <div class="card box p-1 toggle-element " id="elementToToggle" >
    <div class="card-header">
        <h3 class="card-title">WEBGIS MANAGEMENT</h3>
        <span class="mx-auto"></span>
        <span class="btnClose" id="btnClose">x</span>
    </div>
    <div class="card-body">
        <div class="panel panel-primary">
            <div class="tab-menu-heading tab-menu-heading-boxed">
                <div class="tabs-menu-boxed">
                    <!-- Tabs -->
                    <ul class="nav panel-tabs fs-15">
                        @can('webgis.info')
                        <li><a href="#tab17" class="active" data-bs-toggle="tab">INFO</a></li>
                        @endcan
                        @can('webgis.create')
                        <li><a href="#tab18" class="active" data-bs-toggle="tab">Tambah</a></li>
                        <li><a href="#tab19" data-bs-toggle="tab">Update</a></li>
                        @endcan  
                    </ul>
                </div>
            </div>
            <div class="panel-body tabs-menu-body">
              <div class="tab-content scroll-1">
                @can('webgis.info')
                <div class="tab-pane active" id="tab17">
                  <form action="" method="post">
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <label for="info_nik">NO NIK</label>
                          <input  id="info_nik" name="info_nik" class="form-control m-0 w-100 fs-13" readonly>
                        </div>
                        <div class="form-group">
                          <label for="info_name">Nama Lengkap</label>
                          <input type="text"  id="info_name"  class="form-control m-0 w-100 fs-13" readonly>
                        </div>
                        @can('webgis.create')
                        <div class="form-group">
                          <label for="sertifikat">NO Sertifikat</label>
                          <input type="text"  id="info_sertifikat" class="form-control m-0 w-100 fs-13"  readonly>
                        </div>
                        @endcan
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="luas">Luas Tanah(hektar)</label>
                          <input type="text" id="info_luas" class="form-control m-0 w-100 fs-13"  readonly>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="luas">Tahun Terbit</label>
                          <input type="text"  id="info_tahun" class="form-control m-0 w-100 fs-13"  readonly>
                        </div>
                      </div>
                      <div class="col-12">                  
                        <div class="form-group">
                        <label for="status">Status PBB</label>
                        <input type="text" id="info_pbb" class="form-control m-0 w-100 fs-13" readonly>
                      </div>
                      </div>
                     
                  </div>
                   </form>
                </div>
                @endcan
                @can('webgis.create')
                <div class="tab-pane p-0 m-0 active" id="tab18">
                   <form action="{{ route('manage.webgis.store') }}" method="post">
                    @csrf
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <label for="nik">NO NIK</label>
                          <select name="no_nik" id="nik" class="form-control m-0 fs-13" style="width:100%;">
                            <option value="">Pilih NIK</option>
                            @foreach ($niks as $nik)
                                <option value="{{ $nik->id }}">{{ $nik->no_nik }} - {{ $nik->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="sertifikat">NO Sertifikat</label>
                          <input type="text" name="sertifikat" id="sertifikat" class="form-control m-0 w-100 fs-13" placeholder="NO. Ser">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="luas">Luas Tanah(hektar)</label>
                          <input type="text" name="luas" id="luas" class="form-control m-0 w-100 fs-13" placeholder="Luas Tanah">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="tahun">Tahun Terbit</label>
                          <input type="text" name="tahun" id="tahun" class="form-control m-0 w-100 fs-13" placeholder="Tahun Terbit">
                        </div>
                      </div>
                      <div class="col-6">                  
                        <div class="form-group">
                          <label for="status">Status PBB</label>
                          <select name="status" id="status" class="form-control m-0 fs-13" style="width:100%;">
                            <option value="">Pilih</option>
                            <option value="Lunas">Lunas</option>
                            <option value="Belum Lunas">Belum Lunas</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-6">                  
                        <div class="form-group">
                        <label for="geojsondata">Data GeoJson</label>
                        <input type="text" name="geojsondata" id="geojsondata" class="form-control m-0 w-100 fs-13" placeholder="...">
                      </div>
                    </div>
                    <div class="col-12">

                      <button type="submit" class="btn btn-success w-100">Simpan Data</button>
                    </div>
                  </div>
                   </form>
                </div>
                <div class="tab-pane p-0 m-0" id="tab19">
                   <form action="{{ route('manage.webgis.update') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <label for="nik">Nama Pemilik</label>
                          <input type="text" name="name" id="info_na" class="form-control" placeholder="Pemilik">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="id" id="info_id" class="form-control" placeholder="ID">
                        </div>
                        <div class="form-group">
                          <label for="sertifikat">NO Sertifikat</label>
                          <input type="text" name="sertifikat" id="info_ser" class="form-control m-0 w-100 fs-13" placeholder="NO. Ser">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="luas">Luas Tanah(hektar)</label>
                          <input type="text" name="luas" id="info_lu" class="form-control m-0 w-100 fs-13" placeholder="Luas Tanah">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="tahun">Tahun Terbit</label>
                          <input type="text" name="tahun" id="info_th" class="form-control m-0 w-100 fs-13" placeholder="Tahun Terbit">
                        </div>
                      </div>
                      <div class="col-12">                  
                        <div class="form-group">
                          <label for="status">Status PBB</label>
                          <select name="status" id="info_sts" class="form-control m-0 fs-13" style="width:100%;">
                            <option value="">Pilih</option>
                            <option value="Lunas">Lunas</option>
                            <option value="Belum Lunas">Belum Lunas</option>
                          </select>
                          
                        </div>
                      </div>
                      
                    <div class="col-12">

                      <button type="submit" class="btn btn-success w-100">Update Data</button>
                    </div>
                  </div>
                   </form>
                </div>
              </div>
              @endcan
        </div>
    </div>
</div>

</div>
<a href="{{ route('dashboard') }}" class="btn btnDsb bg-white text-black">Dashboard</a>
</div>
@endsection
@section('script')
<script>
  const role = @json($role);
  // Initialize the map
  var map = L.map('map').setView([-1.784338,103.5211066], 16);

  // Add the OpenStreetMap tiles
  var osm = L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    attribution: '&copy; Google'
  });
  osm.addTo(map);

 

 
if(role == 'super-admin'){
  // leaflet draw 
  var drawnFeatures = new L.FeatureGroup();
  map.addLayer(drawnFeatures);

  var drawControl = new L.Control.Draw({
      // position: "topright",
      edit: {
          featureGroup: drawnFeatures,
          remove: true
      },
      draw: {
      polygon: {
       shapeOptions: {
        color: 'purple'
       },
      //  allowIntersection: false,
      //  drawError: {
      //   color: 'orange',
      //   timeout: 1000
      //  },
      },
      polyline: {
       shapeOptions: {
        color: 'red'
       },
      },
      rect: {
       shapeOptions: {
        color: 'green'
       },
      },
      circle: {
       shapeOptions: {
        color: 'steelblue'
       },
      },
     },

  });
  map.addControl(drawControl);
  let layerCount = 1;  // Initial layer count

  map.on("draw:created", function(e) {
      const type = e.layerType;
      const layer = e.layer;
      console.log(layer.toGeoJSON());

      // Increment layer count and assign it to the layer
      layer.layerID = layerCount;

      const geoJSONData = JSON.stringify(layer.toGeoJSON());
      const popupContent = `<p>ID: ${layer.layerID}<br>${geoJSONData}</p>`;

      layer.bindPopup(popupContent);
      drawnFeatures.addLayer(layer);

      $('#geojsondata').val(geoJSONData);
      $('#geojson-paragraph').text(geoJSONData);

      // Increment the layer count for the next layer
      layerCount++;
  });
  map.on("draw:edited", function(e) {
      const layers = e.layers;
      const geoJSONDataArray = [];

      layers.eachLayer(function(layer) {
          console.log(layer);
          const geoJSONData = JSON.stringify(layer.toGeoJSON());
          geoJSONDataArray.push(geoJSONData);

          // Update the popup with the layer's ID and GeoJSON data
          const popupContent = `<p>ID: ${layer.layerID}<br>${geoJSONData}</p>`;
          layer.bindPopup(popupContent);

          drawnFeatures.addLayer(layer);
      });

      const combinedGeoJSONData = geoJSONDataArray.join('\n');
      $('#geojson-paragraph').text(combinedGeoJSONData);
    });
    

  function editLayerByID(layerID) {
      drawnFeatures.eachLayer(function(layer) {
          if (layer.layerID === layerID) {
              // Perform editing actions on the layer with the specified ID
          }
      });
  }
  
  // Example usage: Edit a specific layer by its ID
  // Replace `X` with the desired layer ID
  editLayerByID(1);
  
}
$(document).ready(function() {
  $.getJSON('{{ env('APP_URL')}}manage/webgis-pbb/json', function(data) {
  // $.getJSON('{{ env('APP_URL')}}manage/webgis-pbb/json', function(data) {
    $.each(data, function(index, item) {
        const geojsonUrl = '{{ env('APP_URL') }}geojson/' + item.geojson;

        fetch(geojsonUrl)
            .then(response => response.json())
            .then(geojsonData => {
              const popupContent = `No. NIK: ${item.no_nik}<br>Nama Pemilik: ${item.name}`;
                L.geoJSON(geojsonData, {
                    onEachFeature: function(feature, layer) {
                        if (feature.properties) {

                            const status = item.status;
                            if (status !== 'Lunas') {
                                layer.setStyle({ fillColor: 'yellow', fillOpacity: 0.6 });
                            }
                            layer.bindPopup(popupContent);
                            layer.on('click', function() {
                              // Implementasikan aksi yang ingin Anda lakukan ketika geojson di klik di sini
                              // Misalnya, tampilkan alert dengan informasi geojson
                              $('#info_nik').val(item.no_nik);
                              $('#info_name').val(item.name);
                              $('#info_sertifikat').val(item.no_sertifikat);
                              $('#info_ser').val(item.no_sertifikat);
                              $('#info_luas').val(item.luas_tanah);
                              $('#info_tahun').val(item.tahun_terbit);
                              $('#info_pbb').val(item.status);
                              $('#info_ni').val(item.name);
                              $('#info_th').val(item.tahun_terbit);
                              $('#info_lu').val(item.luas_tanah);
                              $('#info_sts').val(item.status);
                              $('#info_na').val(item.name);
                              $('#info_id').val(item.id);
                              
                              $('#info_sts').select2();
                            });
                        }
                    }
                }).addTo(map);
            })
            .catch(error => console.error('Error fetching GeoJSON:', error));
    });
});

 
   $('#nik').select2();
   $('#status').select2();
    $('#toggleButton').click(function() {
      $('#elementToToggle').toggle(); // Mengubah tampilan elemen saat tombol ditekan
    });
    $('#btnClose').click(function() {
      $('#elementToToggle').toggle(); // Mengubah tampilan elemen saat tombol ditekan
    });
  });

</script>
@endsection