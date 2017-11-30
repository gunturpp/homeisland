import { Component } from '@angular/core';
import { Platform } from 'ionic-angular';
import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';
import { LoginPage } from '../pages/login/login';
import { TabsPage } from '../pages/tabs/tabs';
import { UserDataProvider } from '../provider/user-data';


@Component({
  templateUrl: 'app.html'
})
export class MyApp {
 // rootPage:any = TabsPage;
    rootPage:any = LoginPage;
  constructor(platform: Platform, statusBar: StatusBar, splashScreen: SplashScreen, public data: UserDataProvider) {
    platform.ready().then(() => {
      // Okay, so the platform is ready and our plugins are available.
      // Here you can do any higher level native things you might need.
      statusBar.styleDefault();
      splashScreen.hide();
    });

    this.data.isLogin().then((value)=>{
      if(value){

           this.rootPage = TabsPage;

      } else {
         this.rootPage = LoginPage;
      }    
    });
  }
}
