// import React, { useState, useEffect, useRef } from "react";
import React, { useRef } from "react";
import { QuestionRes, Options } from "../Chatbot/question";
import "./Chats.scss";

interface Props {
  // apiQuestion: QuestionRes;
  dispMsg: QuestionRes;
  // botResponse: {
  //   purpose: string;
  //   message: string;
  //   options?: string[];
  //   sender: string;
  // };
  // botResponse: QuestionRes[]
  sendUserResponse: string;
  optionClick: (ev: React.MouseEvent<HTMLElement>) => void;
}

// interface MessagesInfo {
//   purpose?: string;
//   message: string;
//   options?: string[];
//   sender: string;
// }

const Chats: React.FC<Props> = props => {
  // const [messages, setMessages] = useState<QuestionRes[]>([]);
  // const dummyRef = useRef<HTMLDivElement>(null);
  const bodyRef = useRef<HTMLDivElement>(null);

  // stacking up messages
  // useEffect(() => {
  //   if (messages.length === 0) {
  //     setMessages([
  //       // {
  //       //   purpose: "introduction",
  //       //   message:
  //       //     "Hi there. If you're here, that means you're looking for a job. Tell me, what's your name?",
  //       //   options: ["Frontend", "Backend", "Full Stack"],
  //       //   sender: "bot"
  //       // }
  //     ]);
  //   } else {
  //     let tempArray = [...messages];
  //     tempArray.push({ msg: props.sendUserResponse, sender: "user" });
  //     setMessages(tempArray);

  //     setTimeout(() => {
  //       let temp2 = [...tempArray];
  //       temp2.push(props.botResponse);
  //       setMessages(temp2);
  //     }, 1000);
  //   }
  // }, [props.sendUserResponse, props.botResponse]);

  // enable autoscroll after each message
  // useEffect(() => {
  //   if (dummyRef && dummyRef.current && bodyRef && bodyRef.current) {
  //     bodyRef.current.scrollTo({
  //       top: dummyRef.current.offsetTop,
  //       behavior: "smooth"
  //     });
  //   }
  // }, [messages]);
  

  return (
    <div className="message-container" ref={bodyRef}>
      <section className="msger">
        <main className="msger-chat">
        
           {/* {props.dispMsg.map(
            (_:QuestionRes) =>  */}
            <>
              <div key={props.dispMsg.msg} className="msg">
                <div className={`msg-wrapper ${props.dispMsg.sender}`}>
                  {props.dispMsg.step}
                  {props.dispMsg.msg}
                  {props.dispMsg.aftermsg}
                  {props.dispMsg.beforemsg}
                  {props.dispMsg.options?.map((op:Options) => (
                    <p
                      onClick={e => props.optionClick(e)}
                      data-id={op.step}
                      key={op.step}
                    >
                      {op.text}
                    </p>
                  ))}
                </div>
              </div>
            </>
           {/* )
           } */}
        </main>
      </section>
    </div>
  );
};

export default Chats;
