import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { Http } from '@angular/http';

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
  constructor(public navCtrl: NavController, 
              public navParams: NavParams,
              public http:Http
            ) {
              this.data = this.navParams.data;
              this.nama_kabupaten = this.data;
              console.log(this.data);
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad DetailBintanPage');
  }

  ionViewWillEnter() {
    this.getdataPembeli();
   }


   getdataPembeli(){
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
      }
      else{
        console.log("Error coy");
      }
    });
	}

}
