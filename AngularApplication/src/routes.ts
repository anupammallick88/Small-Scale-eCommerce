import { Routes } from '@angular/router';
import { HomeComponent } from './app/home/home.component';
import { ProductShowComponent } from './app/product/product-show/product-show.component';
import { BuyNowComponent } from './app/order/buy-now/buy-now.component';
import { AuthGuard } from './app/auth.guard';
import { ErrorComponent } from './app/error/error/error.component';
import { OrderListComponent } from './app/order/order-list/order-list.component';
import { OrderCreateComponent } from './app/order/order-create/order-create.component';



export const appRoute: Routes = [

    {path: '', redirectTo: 'home' , pathMatch: 'full'},
    {path: 'user', loadChildren: './user/user.module#UserModule' },

    {path: 'cart', loadChildren: './cart/cart.module#CartModule', canActivate: [AuthGuard]},


    {path: 'home', component: HomeComponent},
    {path: 'products/:id', component: ProductShowComponent},
    {path: 'buy/:id', component: BuyNowComponent, canActivate: [AuthGuard]},
    {path: 'order-place/:id', component: OrderCreateComponent, canActivate: [AuthGuard]},


    {path: 'orders', component: OrderListComponent, canActivate: [AuthGuard]},

   {path: '**', component: ErrorComponent},





];
