import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
//import { ListhomePage } from '../homestay/homestay';
import { HomestayPage } from '../homestay/homestay';
import { Http } from '@angular/http';
import { UserDataProvider } from '../../provider/user-data';
/**
 * Generated class for the ListhomePage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-listhome',
  templateUrl: 'listhome.html',
})
export class ListhomePage {

  raterate: {avg?: any, id_homestay?: any}
  arrRate: any;
  panjang: any;
  length: any;
  data: any;
  seleksi: any;
  data2: any;
  panjang2: any;

  listhomestay : any;
  checkin: any;
  duration: any;
  sumkamar: any;

  id_homestay: any;
  nama_homestay: any;
  alamat_homestay: any;
  foto1_homestay:any;
  kuota_homestay: any;

  email: any;

  sumrating: any;
  sumperating: any;


  constructor(public navCtrl: NavController, public navParams: NavParams, public http: Http, public userdata: UserDataProvider) {
    this.seleksi=[];
    this.sumrating = 0;
    this.sumperating = 0;
    this.arrRate = 0;
   // this.raterate = [];
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad ListhomePage');
  }

  ionViewWillEnter(){
    this.getdatauser();
    this.getdatahomestay();
    this.checkin = this.navParams.get('checkin');
    this.duration = this.navParams.get('duration');
    this.sumkamar = this.navParams.get('sumkamar');
  }

  getdatauser(){
    this.userdata.getEmail().then((email) => {
      this.email = email;
      console.log(this.email)
    });
  
  }

  getdatahomestay(){
    //this.http.get("http://127.0.0.1/homeisland/backend/getSearchHomestay.php?namahome="+ this.navParams.get('destination')+"&kuota="+this.navParams.get('sumkamar')).subscribe(data => {
      this.http.get("http://127.0.0.1:8000/api/get-homestays").subscribe(data => {
        let response = data.json();
     this.data = response.homestays;
     console.log(this.data);
     this.panjang = this.data.length;
     console.log(this.data.length);

       for(var i=0, j=0; i<this.panjang;i++){
         
        
         if(this.data[i].kuota >= this.sumkamar)
         {
            this.seleksi[j] = this.data[i];
            j++;
            
         }   
    }

   //  let response = data.json();



      console.log(response);
      if(response.status=="200"){
        this.listhomestay = response.data;   //ini disimpen ke variabel pasien diatas itu ,, yang udah di delacre
      }
      else{
        console.log("Error coy");
      }
    });

  }

  homestaylog(data){
    console.log(data.id);
  	this.navCtrl.push(HomestayPage,{id_homestay: data.id, checkin: this.checkin,duration: this.duration, sumkamar: this.sumkamar, email: this.email, 
                                               });
  }

}
