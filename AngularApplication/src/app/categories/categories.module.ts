import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { CategoriesService } from '../services/categories.service';
import { CategoriesSidebarComponent } from './categories-sidebar/categories-sidebar.component';

@NgModule({
  declarations: [
    CategoriesSidebarComponent,
  ],
  imports: [
    CommonModule,
  ],
  providers: [
    CategoriesService,
  ],
  exports: [
    CategoriesSidebarComponent,
  ]
})
export class CategoriesModule { }
