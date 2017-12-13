import { Component, ElementRef, ViewChild  } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { Http } from '@angular/http';
// import { GoogleMaps, GoogleMap, GoogleMapsEvent, GoogleMapOptions, CameraPosition, MarkerOptions ,Marker
//  } from '@ionic-native/google-maps';
 import { Geolocation ,GeolocationOptions ,Geoposition ,PositionError } from '@ionic-native/geolocation'; 
//import { ViewChild } from '@angular/core/src/metadata/di';
import { ElementDef } from '@angular/core/src/view';

declare var google;


/**
 * Generated class for the DetailSouvenirPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-detail-souvenir',
  templateUrl: 'detail-souvenir.html',
})
export class DetailSouvenirPage {
  data: any;
  nama_toko: any;
  alamat: any;
  foto_1: any;
  array: any;

  options : GeolocationOptions;
  currentPos : Geoposition;
  @ViewChild('map') mapElement : ElementRef;
  @ViewChild('directionsPanel') directionsPanel: ElementRef;
  map: any;
  places : Array<any> ;
  langt : string;
  longt : string;
  foto_2: any;
  foto_3: any;
  hours : any;
  minutes : any;  

  constructor(public navCtrl: NavController, 
              public http:Http, 
              public navParams: NavParams,
              private geolocation: Geolocation
            ) {
    this.data = this.navParams.data;
    console.log(this.data.nama_toko);
    this.nama_toko = this.data.nama_toko;
    this.alamat = this.data.alamat;
    this.langt = this.data.lat;
    this.longt = this.data.long;
    console.log(this.data);
    console.log(this.data.longt);
    this.foto_1 = this.data.foto_1;
    this.foto_2 = this.data.foto_2;
    this.foto_3 = this.data.foto_3;

    this.hours = new Date().getHours();
    this.minutes = new Date().getMinutes();
    
    if(this.hours < 2)
    console.log(this.hours);
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad DetailSouvenirPage');

    this.getUserPosition();
  }

//   getdataSouvenir(){
//     let data = JSON.stringify({
//                      nama_toko: this.data 
//                  });
     
//    this.http.get("http://127.0.0.1/homeisland/backend/getSouvenir.php?nama_toko="+ this.data).subscribe(data => {
//      let response = data.json();
//      console.log(response);
//      if(response.status=="200"){
//        this.array = response.data;   //ini disimpen ke variabel pasien diatas itu ,, yang udah di delacre
//        this.nama_toko = this.array[0].nama_toko;
//        this.alamat = this.array[0].alamat;
//      }
//      else{
//        console.log("Error coy");
//      }
//    });
//  }

 getUserPosition(){
  this.options = {
    enableHighAccuracy : true
  };
  this.geolocation.getCurrentPosition(this.options)
  .then((pos : Geoposition) => {
    this.currentPos = pos;
    console.log(pos);
    console.log(this.langt, this.longt);
   //  this.addMap(pos.coords.latitude, pos.coords.longitude)
   this.loadMap(pos.coords.latitude, pos.coords.longitude);
   this.startNavigating(pos.coords.latitude, pos.coords.longitude, this.longt, this.langt);
  },(err : PositionError)=>{
  console.log("error : " + err.message)
});


}



loadMap(lat, long){
 
        let latLng = new google.maps.LatLng(lat, long);
 
        let mapOptions = {
          center: latLng,
          zoom: 15,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
 
        this.map = new google.maps.Map(this.mapElement.nativeElement, mapOptions);
 
    }
 
    startNavigating(lat, lang, langt, longt){
        let latLng = new google.maps.LatLng(lat, lang);
        let langtLngt = new google.maps.LatLng(langt, longt);

        let directionsService = new google.maps.DirectionsService;
        let directionsDisplay = new google.maps.DirectionsRenderer;
 
        directionsDisplay.setMap(this.map);
        directionsDisplay.setPanel(this.directionsPanel.nativeElement);
 
        directionsService.route({
         origin: latLng,
         destination: langtLngt,
            travelMode: google.maps.TravelMode['DRIVING']
        }, (res, status) => {
 
            if(status == google.maps.DirectionsStatus.OK){
                directionsDisplay.setDirections(res);
            } else {
                console.warn(status);
            }
 
        });
 
    }
}
