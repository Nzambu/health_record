export default class Patient {
    constructor(id, gender_id, service_id, name, dob, comments) {
      this.id = id;
      this.gender_id = gender_id;
      this.service_id = service_id;
      this.name = name;
      this.dob = dob;
      this.comments = comments;
    }
  }