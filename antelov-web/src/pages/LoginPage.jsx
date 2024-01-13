import { useEffect, useState } from "react";
import BlueInput from "../components/blueInput";
import PrimaryButton from "../components/primaryButton";

const LoginPage = () => {
  return (
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
              src="../../src/assets/decoration.svg"
              alt=""
              className=" w-[550px] h-[450px] absolute left-[-75px]  top-[125px] xs:left-[0px] xs:top-[100px] xs:mt-[100px] ml-16"
            />
            <div className="p-2 absolute right-[195px]   xs:top-5 xs:right-14 xs:p-6 ">
              <BlueInput w={260} h={40} inputName="Email adress or username" />
              <BlueInput w={260} h={40} inputName="Password" />
              <h5 className="text-red-600  p-2 hover:cursor-pointer">
                forgot password ?
              </h5>
            </div>
            <img
              src="../../src/assets/character.svg"
              alt=" "
              className="w-[600px]   xs:mt-[120px] "
            />
          </div>
        </div>
        <div className=" flex flex-col justify-center items-center  ">
          <PrimaryButton text={"Sign in "} w={200} h={40} />
          <h5>
            Don’t have an account ?{" "}
            <span className="text-[#FE6019] hover:cursor-pointer">Sign Up</span>
          </h5>
        </div>
      </div>
    </div>
  );
};
// decoration.svg
export default LoginPage;
