import React from "react";

import PrimaryButton from "../components/primaryButton";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faEnvelope, faCheck } from "@fortawesome/free-solid-svg-icons";

const LandingScreen = () => {
  return (
    <div>
      {/*************** Header *************/}
      <div className="p-2 px-5 mt-2 flex justify-between">
        <img
          src="../../src/assets/6.png"
          className="w-16 h-16  p-2 text-2xl font-semibold  "
          alt=""
        />
        <div className="flex items-center px-2 ">
          <div className="px-5 cursor-pointer">
            <h1 className=" text-[#4B75CB] text-lg   hover:border-b-2 border-[#4B75CB] ">
              Explore our services
            </h1>
          </div>{" "}
          <PrimaryButton text={"Sign Up now "} w={180} h={40} />
        </div>
      </div>
      {/* Body */}
      <div>
        {/* part 1 */}
        <div className="flex flex-wrap  items-center justify-around">
          {/* 1 */}
          <div>
            <span className=" animate-[bounce_2s_ease-in-out_infinite]  rounded-full w-10 h-10 bg-[#FFD9C7]  absolute left-28 top-28 "></span>
            <h1 className="text-[#233863] font-poppins text-3xl mt-10 px-20 pt-10">
              We connect Movers to your doorstep
            </h1>
            <div className="px-28 z-20 font-poppins">
              <i>
                <span className=" h-5 w-5 p-2">
                  <FontAwesomeIcon icon={faCheck} color="green" size={5} />
                </span>
                Describe your need. <br />
                <span className=" h-5 w-5 p-2">
                  <FontAwesomeIcon icon={faCheck} color="green" size={5} />
                </span>
                Post the request. <br />
                <span className=" h-5 w-5 p-2">
                  <FontAwesomeIcon icon={faCheck} color="green" size={5} />
                </span>
                Choose from the bids & offers you <br />
                receive.
              </i>
            </div>
            <span className=" animate-[bounce_3.750s_ease-in-out_infinite] rounded-full w-16 h-16 bg-[#FE6F2E] absolute  top-72 left-[500px] "></span>
          </div>

          {/* 2 */}
          <div>
            <img
              src="../../src/assets/landingpage 1 1.svg"
              alt=""
              className="w-[450px]     shadow-none "
            />
          </div>
        </div>
        {/* animation */}
        <span className=" animate-[bounce_2s_ease-in-out_infinite] rounded-full w-16 h-16 bg-[#FFD9C7] absolute  top-56 right-0 "></span>
        <span className=" animate-[bounce_3.750s_ease-in-out_infinite] rounded-full w-10 h-10 bg-[#FE6F2E]  absolute right-72 top-24 "></span>

        <span className=" animate-[bounce_2s_ease-in-out_infinite] rounded-full w-10 h-10 bg-[#FE6F2E]  absolute right-56 top-[400px]"></span>
        <span className=" animate-[bounce_3.750s_ease-in-out_infinite] rounded-full w-10 h-10 bg-[#FFD9C7]  absolute left-56 top-[400px]"></span>
        {/* part 2  */}
        <div className="py-20">
          <h1 className="  text-center text-[35px] font-medium  font-poppins text-[#233863] ">
            Our Services
          </h1>
          <div className="grid grid-cols-4  m-20">

          <div className="bg-red-500 w-5 h-12">d</div>
          <div className="bg-red-500 w-5 h-12">d</div>
          <div className="bg-red-500 w-5 h-12">d</div>
            <div className="bg-red-500 w-5 h-12">d</div>
          </div>
        </div>
        {/* part 3 */}
        <div className="flex flex-wrap-reverse justify-around items-center">
          <img
            src="../../src/assets/2150709838-removebg-preview 1.svg"
            alt=""
            className="w-[450px]    "
          />
          <div className="  font-poppins text-[#000000] ">
            <h1 className="text-2xl">We work with Trusted Movers</h1>
            <i>
              We partner with Trusted Movers with <br />
              proven track records and credentials. <br />
              For more information, talk with us.
            </i>
            <div className="p-10">
              <PrimaryButton text={"Contact us Now"} w={180} h={40} />
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default LandingScreen;
