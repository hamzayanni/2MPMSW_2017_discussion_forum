import {Space} from "./space";
import {User} from "./user";
export class Question {
  id: string;
  title: string;
  description: string;
  space: Space;
  user: User;
  resolved: boolean;
  hasResponse: boolean;

}
