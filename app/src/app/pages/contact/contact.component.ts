import { Component, OnInit } from '@angular/core';
import { IndexService } from 'src/app/service/index.service';

@Component({
  selector: 'app-contact',
  templateUrl: './contact.component.html',
  styleUrls: ['./contact.component.css']
})
export class ContactComponent implements OnInit {

  contact = {
    email: "",
    objet: "",
    message: ""
  };


  constructor( public indexSrv: IndexService) { }

  ngOnInit(): void {
  }

  save() {
    console.log(this.contact);

    this.indexSrv.sendContact(this.contact)
      .then(() => {
        this.indexSrv.http.toastr.success("Message envoyé avec succès");
      })
      .catch(() => {
      });
  }

}
