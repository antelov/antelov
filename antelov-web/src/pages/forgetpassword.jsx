import React from 'react'
import { useEffect, useState } from "react";
import BlueInput from "../components/blueInput";
import PrimaryButton from "../components/primaryButton";

const forgetpassword = () => {
  return (
    <div>
        <div className="bg-[#FFF7F3]">
      <div className=" flex justify-end items-start px-5  xs:items-center xs:justify-center ">
        <img
          src="../../src/assets/6.png"
          className="w-24 h-24  text-2xl font-semibold whitespace-nowrap dark:text-black  "
          alt=""
        />
      </div>

      <div className="">
        <div className="relative flex justify-center items-center  ">
          <div className="relative flex justify-around items-center  ">
            <img
              src="../../src/assets/cred 1.svg"
              alt=""
              className=" w-[550px] h-[450px] "
            />
            <div className="p-2 absolute right-[195px]   xs:top-5 xs:right-14 xs:p-6 ">
              <BlueInput w={260} h={40} inputName="new password" />
              <BlueInput w={260} h={40} inputName="confirm password" />
             
            </div>
            <img
              src="../../src/assets/forgetpasswordimage.svg"
              alt=" "
              className=" xs:mt-[120px] w-1/5 h-1/3 "
            />
          </div>
        </div>
        <div className=" flex flex-col justify-center items-center  ">
          <PrimaryButton text={"reset "} w={200} h={40} />
          <h5>
          already have an account ?{" "}
            <span className="text-[#FE6019] hover:cursor-pointer">Sign In</span>
          </h5>
        </div>
      </div>
    </div>
    </div>
  )
}

export default forgetpassword