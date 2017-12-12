import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { Http } from '@angular/http';
/**
 * Generated class for the DetailNewsPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-detail-news',
  templateUrl: 'detail-news.html',
})
export class DetailNewsPage {
   datanews: any;
   data: any;
   judul : any;
   tgl : any;
   isi : any;
   foto : any;
  constructor(public navCtrl: NavController, 
  	public navParams: NavParams, public http:Http) {

  this.data = this.navParams.data;
  this.judul = this.data.judul;
  this.isi = this.data.deskripsi;
  this.foto = this.data.foto;
  this.tgl = this.data.updated_at;
  
  console.log(this.data.judul);

  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad DetailNewsPage');
  }

  ionViewWillEnter(){
  // this.getdataNews();	
  }

  // getdataNews(){
  // 	let data = JSON.stringify({
  // 		news: this.data
  // 	});
  // 	this.http.get("http://127.0.0.1/homeisland/backend/getNews.php?news="+ this.navParams.get('id_news')).subscribe(data => {
  // 		let response = data.json();
  //     console.log(response);
  //     if(response.status=="200"){
  //       this.datanews = response.data;   //ini disimpen ke variabel pasien diatas itu ,, yang udah di delacre
  //       this.tgl = this.datanews[0].date;
  //     	this.isi = this.datanews[0].isi;
  //     	this.foto = this.datanews[0].foto;
  //     }
  //     else{
  //       console.log("Error coy");
  //     }
  //   });

  // }

}
