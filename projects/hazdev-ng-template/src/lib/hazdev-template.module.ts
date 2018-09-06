import { NgModule } from '@angular/core';
import { MatButtonModule, MatFormFieldModule, MatInputModule, MatListModule } from '@angular/material';
import { BrowserModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { RouterModule } from '@angular/router';

import { FooterComponent } from './footer/footer.component';
import { HazdevTemplateComponent } from './hazdev-template.component';
import { HeaderComponent } from './header/header.component';
import { NavigationGroupComponent } from './navigation-group/navigation-group.component';
import { NavigationItemComponent } from './navigation-item/navigation-item.component';
import { NavigationComponent } from './navigation/navigation.component';
import { PageComponent } from './page/page.component';
import { SidenavComponent } from './sidenav/sidenav.component';

@NgModule({
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    MatButtonModule,
    MatFormFieldModule,
    MatInputModule,
    MatListModule,
    RouterModule.forRoot([])
  ],
  declarations: [
    HazdevTemplateComponent,
    FooterComponent,
    HeaderComponent,
    NavigationComponent,
    PageComponent,
    SidenavComponent,
    NavigationItemComponent,
    NavigationGroupComponent
  ],
  exports: [
    HazdevTemplateComponent,
    NavigationGroupComponent,
    NavigationItemComponent
  ]
})
export class HazdevTemplateModule {}