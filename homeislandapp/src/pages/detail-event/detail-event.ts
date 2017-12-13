import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, AlertController } from 'ionic-angular';
import { Http } from '@angular/http';
/**
 * Generated class for the DetailEventPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-detail-event',
  templateUrl: 'detail-event.html',
})
export class DetailEventPage {
  datanews: any;
  data: any;
  judul : any;
  tgl : any;
  isi : any;
  foto : any;
  star: number;

  constructor(public navCtrl: NavController, 
              public navParams: NavParams, 
              public http:Http,
              public alertCtrl: AlertController
            ) {
      this.data = this.navParams.data;
      this.judul = this.data.judul;
      this.isi = this.data.deskripsi;
      this.foto = this.data.foto_1;
      this.tgl = this.data.updated_at;
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad DetailEventPage');
  }

  Favorit(){
    this.star++;
    this.showAlert('Terima Kasih', 'Terima kasih telah memilih event ini sebagai favorit');
  }

  showAlert(title: string, text: string) {
    let alert = this.alertCtrl.create({
      title: title,
      subTitle: text,
      buttons: ['OK']
    });
    alert.present();
  }

}
