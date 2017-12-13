import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { Http } from '@angular/http';

/**
 * Generated class for the BintanPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-bintan',
  templateUrl: 'bintan.html',
})
export class BintanPage {
  data:string;
  nama_kabupaten: string;
  recreation: any;
  food: any;

  // explore : any;
  kabupaten : any;

  constructor(public navCtrl: NavController, public navParams: NavParams, public http: Http) {
    this.data = this.navParams.data;
    this.nama_kabupaten = this.data;
    this.kabupaten = [];
    this.recreation = [];
    this.food = [];
    
    console.log(this.data);
    this.getdataExplore();
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad BintanPage');
  }

  wisata(data){
    this.navCtrl.push('DetailBintanPage', data);
  }

  foods(data1){
      this.navCtrl.push('DetailBintanPage', data1);

  }

  getdataExplore(){
    
   // this.http.get("http://127.0.0.1/homeisland/backend/getListNews.php").subscribe(data => {
     this.http.get("http://127.0.0.1:8000/api/get-explores").subscribe(data => {
       let response = data.json();
       var explore = response.explores;

        console.log(explore[0].kabupaten);
       if(response.status=="200"){
       }

       for(var i =0, j =0; i<explore.length; i++){
         if(explore[i].kabupaten == this.data){
              this.kabupaten[j] = explore[i];
              j++; 
         }
       }

       for(var i =0, j =0; i< this.kabupaten.length; i++){
        if(this.kabupaten[i].category == "Recreation"){
             this.recreation[j] = this.kabupaten[i];
             j++; 
        }
      }

      for(var i =0, j =0; i< this.kabupaten.length; i++){
        if(this.kabupaten[i].category == "Food"){
             this.food[j] = this.kabupaten[i];
             j++; 
        }
      }
      console.log(this.food);
       console.log(this.recreation);

      //  for(var i =0, j=0; i<)
     });     
  }

}
