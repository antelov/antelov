import React from "react";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import {
  faCalendarDays,
  faPaperPlane,
  faFolder,
  faClipboard,
} from "@fortawesome/free-solid-svg-icons";
const SideBar = () => {
  return (
    <div className="h-[70vh] sticky z-10  bg-white shadow-xl text-[#334D6E] font-medium  ">
      <div className=" flex justify-center gap-5 text-center  items-center pt-[050px]  p-2 ">
        <FontAwesomeIcon icon={faCalendarDays} color="#90A0B7" />
        <p className="w-[100px] cursor-pointer hover:border-b hover:border-[#334D6E]">
          Calender
        </p>
      </div>
      <div className=" flex justify-center gap-5 text-center  items-center p-2">
        <FontAwesomeIcon icon={faPaperPlane} color="#90A0B7" light={true} />
        <p className="w-[100px] cursor-pointer hover:border-b hover:border-[#334D6E]">
          Post
        </p>
      </div>
      <div className=" flex justify-center gap-5 text-center  items-center p-2">
        <FontAwesomeIcon icon={faClipboard} color="#90A0B7" />
        <p className="w-[100px] cursor-pointer hover:border-b hover:border-[#334D6E]">
          reports
        </p>
      </div>
      <div className=" flex justify-center gap-5 text-center  items-center p-2">
        <FontAwesomeIcon icon={faFolder} color="#90A0B7" />
        <p className="w-[100px] cursor-pointer hover:border-b hover:border-[#334D6E]">
          Document
        </p>
      </div>
    </div>
  );
};

export default SideBar;
