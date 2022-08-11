import React, { useState } from "react";
import axios from "axios";
import Chats from "../Chats/Chats";
// import { analyzeNextSteps } from "../../HelperFunctions/analyzeNextSteps";
import { QuestionRes } from "./question";

import "./Chatbot.scss";

const baseURL = "http://18.183.194.58/api/question";

// interface ResponseBotObject {
//   purpose: string;
//   message: string;
//   options?: string[];
//   sender: string;
// }

const Chatbot: React.FC = () => {
  const [userResponse, setUserResponse] = useState<string>("");
  const [step, setStep] = useState<number>(0);

  // const [botResponse, setBotResponse] = useState<ResponseBotObject>({
  //   purpose: "",
  //   message: "",
  //   sender: "bot"
  // });
   const [dispMsg, setDispMsg] = useState<QuestionRes>({
    step: 1,
    msg: "",
    beforemsg: "",
    aftermsg: "",
    options: [],
    sender: ""
   });

   const [botResponse, setBotResponse] = useState<QuestionRes[]>([{
    step: 1,
    msg: "",
    beforemsg: "",
    aftermsg: "",
    options: [],
    sender: ""
  }]);

  const [sendUserResponse, setSendUserResponse] = useState<string>("");

  const choiceStep = (step: string) => {
    const res = botResponse.filter((_) => _.step === parseInt(step));
    setDispMsg(res[0]);
  };

  // setting next step when there's response and option click
  const setNextStep = (response: string) => {
    setStep(prevState => prevState + 1);
    setSendUserResponse(response);
    // const res = analyzeNextSteps(response);
    choiceStep(response)
    setUserResponse("");
  };

  const optionClick = (e: React.MouseEvent<HTMLElement>) => {
    const option = e.currentTarget.dataset.id;
    console.log(option);
    if (option) {
      setNextStep(option);
    }
  };

  // event handlers
  const handleInputChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    setUserResponse(e.target.value);
  };

  const handleSubmit = (e: React.FormEvent<HTMLFormElement>) => {
    e.preventDefault();
    setNextStep(userResponse);
  };

  // const [post, setPost] = React.useState(null);
  // APIから取得した値をセット 1問目だけセット
  React.useEffect(() => {
    axios.get(baseURL).then((response) => {
      setBotResponse(response.data);
      const initialData = response.data.filter((_: QuestionRes) => _.step === 1);
      setDispMsg(initialData);
    });
  }, []);

  return (
    <div className="chat-container">
      <Chats
        dispMsg={dispMsg}
        // botResponse={botResponse}
        sendUserResponse={sendUserResponse}
        optionClick={optionClick}
      />

      <form onSubmit={e => handleSubmit(e)} className="msger-inputarea">
        <input
          onChange={e => handleInputChange(e)}
          className="msger-input"
          placeholder="Enter your message..."
          value={userResponse}
        ></input>
        <button type="submit" className="msger-send-btn"><i className="far fa-paper-plane"></i>Send</button>
      </form>
    </div>
  );
};

export default Chatbot;
