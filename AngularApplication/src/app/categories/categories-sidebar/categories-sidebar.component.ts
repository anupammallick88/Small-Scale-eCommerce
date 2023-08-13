import { Component, OnInit, Output, EventEmitter } from '@angular/core';
import { ICategories } from '../../models/categories';
import { CategoriesService } from '../../services/categories.service';

@Component({
  selector: 'app-categories-sidebar',
  templateUrl: './categories-sidebar.component.html',
  styleUrls: ['./categories-sidebar.component.css']
})
export class CategoriesSidebarComponent implements OnInit {
  categories: ICategories[];
  @Output() getCategoryId = new EventEmitter();

  constructor(private categoryService: CategoriesService) { }

  ngOnInit() {
      this.categoryService.getAll().subscribe(data => {
          this.categories = data;
      });
  }

  getCategory(id) {
    this.getCategoryId.emit(id);
  }

}
