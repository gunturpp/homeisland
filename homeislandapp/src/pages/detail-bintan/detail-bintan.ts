import { Component, ElementRef, ViewChild } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { Http } from '@angular/http';
// import { GoogleMaps, GoogleMap, GoogleMapsEvent, GoogleMapOptions, CameraPosition, MarkerOptions ,Marker
//  } from '@ionic-native/google-maps';
 import { Geolocation ,GeolocationOptions ,Geoposition ,PositionError } from '@ionic-native/geolocation'; 
//import { ViewChild } from '@angular/core/src/metadata/di';
import { ElementDef } from '@angular/core/src/view';


declare var google;
/**
 * Generated class for the DetailBintanPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-detail-bintan',
  templateUrl: 'detail-bintan.html',
})
export class DetailBintanPage {

  haha: any;
  data: string;
  nama_wisata: string;
  alamat: string; 
  nama_kabupaten : string;
  options : GeolocationOptions;
  currentPos : Geoposition;
  @ViewChild('map') mapElement : ElementRef;
  map: any;
  places : Array<any> ;
  langt : string;
  longt : string;

  constructor(public navCtrl: NavController, 
              public navParams: NavParams,
              public http:Http,
              private geolocation: Geolocation
            ) {
              this.data = this.navParams.data;
              this.nama_kabupaten = this.data;
              console.log(this.data);
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad DetailBintanPage');
    this.getUserPosition();
  }

  ionViewWillEnter() {
    this.getdataExplore();
   }


   getdataExplore(){
     let data = JSON.stringify({
                      nama_kabupaten: this.data 
                  });
      
    this.http.get("http://127.0.0.1/homeisland/backend/getExplore.php?nama_kabupaten="+ this.data).subscribe(data => {
      let response = data.json();
      console.log(response);
      if(response.status=="200"){
        this.haha = response.data;   //ini disimpen ke variabel pasien diatas itu ,, yang udah di delacre
        this.nama_wisata = this.haha[0].nama_wisata;
        this.alamat = this.haha[0].alamat;
        this.langt = this.haha[0].langt;
        this.longt = this.haha[0].longt;
        console.log(this.langt);
      }
      else{
        console.log("Error coy");
      }
    });
  }
  
  addMap(lat,long){
    
        let latLng = new google.maps.LatLng(lat, long);
    
        let mapOptions = {
        center: latLng,
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        }
    
        this.map = new google.maps.Map(this.mapElement.nativeElement, mapOptions);
        this.getRestaurants(latLng)
        .then((results : Array<any>)=>{
          this.places = results;
          for(let i = 0; i < results.length; i++){
              this.createMarker(results[i]);
          }
        }, (status)=>console.log(status));
    
        this.addMarker();
     }
    
     addMarker(){
    
        let marker = new google.maps.Marker({
        map: this.map,
        animation: google.maps.Animation.DROP,
        position: this.map.getCenter()
        });
    
        let content = "<p>This is your current position !</p>";
        let infoWindow = new google.maps.InfoWindow({
        content: content
        });
    
        google.maps.event.addListener(marker, 'click', () => {
        infoWindow.open(this.map, marker);
        });
    
     }
    
     getUserPosition(){
       this.options = {
         enableHighAccuracy : true
       };
       this.geolocation.getCurrentPosition(this.options)
       .then((pos : Geoposition) => {
         this.currentPos = pos;
         console.log(pos);
         this.addMap(pos.coords.latitude, pos.coords.longitude)
       },(err : PositionError)=>{
       console.log("error : " + err.message)
     });
    
    
     }
    
     getRestaurants(latLng)
    {
        var service = new google.maps.places.PlacesService(this.map);
        let request = {
            location : latLng,
            radius : 8047 ,
            types: ["restaurants"]
        };
        return new Promise((resolve,reject)=>{
            service.nearbySearch(request,function(results,status){
                if(status === google.maps.places.PlacesServiceStatus.OK)
                {
                    resolve(results);
                }else
                {
                    reject(status);
                }
    
            });
        });
    
    }
    
    createMarker(place)
    {
        let marker = new google.maps.Marker({
        map: this.map,
        animation: google.maps.Animation.DROP,
        position: place.geometry.location,
        });
        let content = "<p>Restoran cooy !</p>";
        let infoWindow = new google.maps.InfoWindow({
        content: content
        });

            
        google.maps.event.addListener(marker, 'click', () => {
        infoWindow.open(this.map, marker);
        });
    
    }

}
