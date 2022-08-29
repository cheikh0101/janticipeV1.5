import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Cours } from 'src/app/model/Cours';
import { Type } from 'src/app/model/Type';
import { BaseService } from 'src/app/service/base.service';
import { CoursService } from 'src/app/service/cours.service';
import { IndexService } from 'src/app/service/index.service';

@Component({
  selector: 'app-cours-show',
  templateUrl: './cours-show.component.html',
  styleUrls: ['./cours-show.component.css']
})
export class CoursShowComponent implements OnInit {

  pdfSrc = "https://vadimdez.github.io/ng2-pdf-viewer/assets/pdf-test.pdf";
  cours: Cours;
  types: Type[] = [];

  constructor( public activatedRoute: ActivatedRoute, public coursSrv: CoursService, public indexSrv:IndexService) {
    this.cours = Object.create(null);
   }

  ngOnInit(): void {
    this.findCours();
    this.getAllTypes();
  }

  findCours() {
    this.coursSrv.findOneById(this.activatedRoute.snapshot.params["id"])
      .then((data: any) => {
        this.cours = data;
        console.log(this.cours);

      })
      .catch(() => { })
  }

  getAllTypes() {
    this.indexSrv.getTypes()
      .then((data:any) => {
        this.types = data;
        console.log(this.types);

      } )
  }
}
