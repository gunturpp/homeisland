import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { Http } from '@angular/http';


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
  data: string;
  nama_toko: string;
  alamat: string;
  array: any;


  constructor(public navCtrl: NavController, public http:Http, public navParams: NavParams) {
    this.data = this.navParams.data;
    this.nama_toko = this.data;
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad DetailSouvenirPage');
    this.getdataSouvenir();
  }

  getdataSouvenir(){
    let data = JSON.stringify({
                     nama_toko: this.data 
                 });
     
   this.http.get("http://127.0.0.1/homeisland/backend/getSouvenir.php?nama_toko="+ this.data).subscribe(data => {
     let response = data.json();
     console.log(response);
     if(response.status=="200"){
       this.array = response.data;   //ini disimpen ke variabel pasien diatas itu ,, yang udah di delacre
       this.nama_toko = this.array[0].nama_toko;
       this.alamat = this.array[0].alamat;
     }
     else{
       console.log("Error coy");
     }
   });
 }
}
