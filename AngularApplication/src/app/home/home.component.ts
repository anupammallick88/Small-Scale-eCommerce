import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {
  categoryId: any = 'all';

  constructor(private route: ActivatedRoute) { }


  ngOnInit() {
  }

  setCategoryId(id) {

    this.categoryId = id;
  }

}
