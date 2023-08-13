import { NgModule } from "@angular/core";
import { CommonModule } from '@angular/common';
// import { RouterModule } from '@angular/router'
// import { productRoute } from './product.routes';
import { ProductService } from '../services/product.service';
import { ProductThumbnailComponent } from './product-thumbnail/product-thumbnail.component';
import { ProductShowComponent } from './product-show/product-show.component';
import { ProductListComponent } from './product-list/product-list.component';
import { RouterModule } from '@angular/router';

@NgModule({
    imports:[
        CommonModule,
        // RouterModule.forChild(productRoute),
        RouterModule
    ],
    declarations: [
        ProductThumbnailComponent,
        ProductShowComponent,
        ProductListComponent,
    ],
    providers: [
        ProductService
    ],
    exports: [
      ProductThumbnailComponent,
      ProductListComponent,
      ProductShowComponent
    ]
})

export class ProductModule {

}
