import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { HomestayPage } from './homestay';

@NgModule({
  declarations: [
    HomestayPage,
  ],
  imports: [
    IonicPageModule.forChild(HomestayPage),
  ],
})
export class HomestayPageModule {}
