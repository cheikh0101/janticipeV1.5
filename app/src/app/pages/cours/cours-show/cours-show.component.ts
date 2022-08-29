import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Cours } from 'src/app/model/Cours';
import { BaseService } from 'src/app/service/base.service';
import { CoursService } from 'src/app/service/cours.service';

@Component({
  selector: 'app-cours-show',
  templateUrl: './cours-show.component.html',
  styleUrls: ['./cours-show.component.css']
})
export class CoursShowComponent implements OnInit {

  pdfSrc = "https://vadimdez.github.io/ng2-pdf-viewer/assets/pdf-test.pdf";
  cours: Cours;

  constructor( public activatedRoute: ActivatedRoute, public coursSrv: CoursService) {
    this.cours = Object.create(null);
   }

  ngOnInit(): void {
    this.findCours();
  }

  findCours() {
    this.coursSrv.findOneById(this.activatedRoute.snapshot.params["id"])
      .then((data: any) => {
        this.cours = data;
        console.log(this.cours);

      })
      .catch(() => { })
  }
}
