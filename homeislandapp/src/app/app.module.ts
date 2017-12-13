import { ContactEditPage } from './../pages/contact-edit/contact-edit';
import { TesPage } from './../pages/tes/tes';
import { NgModule, ErrorHandler } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { IonicApp, IonicModule, IonicErrorHandler } from 'ionic-angular';
import { MyApp } from './app.component';
import { SignupPage } from '../pages/signup/signup';
import { AboutPage } from '../pages/about/about';
import { ContactPage } from '../pages/contact/contact';
import { HomePage } from '../pages/home/home';
import { TabsPage } from '../pages/tabs/tabs';
import { LoginPage } from '../pages/login/login';
import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';
import { UserDataProvider } from '../provider/user-data';
import { GoogleMaps, GoogleMap, GoogleMapsEvent, GoogleMapOptions, CameraPosition, MarkerOptions, Marker } from '@ionic-native/google-maps';
//import { GoogleMaps } from '../provider/google-maps';
import { Geolocation ,GeolocationOptions ,Geoposition ,PositionError } from '@ionic-native/geolocation';
import { Http } from '@angular/http';
import { HttpModule } from '@angular/http';
import { IonicStorageModule } from '@ionic/storage';
import { UpdateAkunPage} from '../pages/update-akun/update-akun';
import { ListhomePage} from '../pages/listhome/listhome';
import {HomestayPage} from '../pages/homestay/homestay';
import {DetailNewsPage} from '../pages/detail-news/detail-news';
import {DetailEventPage} from '../pages/detail-event/detail-event';


@NgModule({
  declarations: [
    MyApp,
    AboutPage,
    ContactPage,
    HomePage,
    TabsPage,
    LoginPage,
    SignupPage,
    UpdateAkunPage,
    ListhomePage,
    HomestayPage,
    DetailNewsPage,
    TesPage,
    ContactEditPage,
    DetailEventPage
  ],
  imports: [
    IonicModule.forRoot(MyApp),
    BrowserModule,
    HttpModule,
    IonicStorageModule.forRoot(),
    

  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    AboutPage,
    ContactPage,
    HomePage,
    TabsPage,
    LoginPage,
    SignupPage,
    UpdateAkunPage,
    ListhomePage,
    HomestayPage,
    DetailNewsPage,
    TesPage,
    ContactEditPage,
    DetailEventPage
  ],
  providers: [
    StatusBar,
    SplashScreen,
    UserDataProvider,
    GoogleMaps,
    Geolocation,
    GoogleMaps,
    //Storage,

    {provide: ErrorHandler, useClass: IonicErrorHandler}
  ]
})
export class AppModule {}
