import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { ListhomePage } from './listhome';

@NgModule({
  declarations: [
    ListhomePage,
  ],
  imports: [
    IonicPageModule.forChild(ListhomePage),
  ],
})
export class ListhomePageModule {}
