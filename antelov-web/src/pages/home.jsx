import React, { useEffect } from "react";
import { Carousel } from "@material-tailwind/react";
import PrimaryButton from "../components/primaryButton";
import BlueInput from "../components/blueInput";
import AOS from "aos";
import "aos/dist/aos.css";

import styles from "../style";
import LoginPage from "./LoginPage";
import SignUp from "./SignUp";
import SignInMover from "./SignInMover"
import Contact  from './contact'
import SubmitRequest from "./submitRequest"
import Footer from './footer'
const home = () => {
  useEffect(() => {
    AOS.init();
    AOS.refresh();
  }, []);

  return (
    <div className=" " data-aos="fade-up">
      
      < SubmitRequest />
      {/* <span className=" bg-[url('../../src/assets/src/assets/background_art.svg')] w-5 h-8 "></span>
      <div className="row relative z-10 justify-center px-7 pb-10 pt-20 2xl:px-48 items-center ">
        <h1 className=" mb-12 text-center text-h2-sm font-medium lg:text-5xl ">
          Antelov Your Elegant Moving Solution Gracefully relocate with
          precision and ease
        </h1>
        <div className="flex  justify-center">
          <PrimaryButton text={"Register"} w={200} h={40} />
        </div>
        <span className=" bg-[url('../../src/assets/src/assets/background_art.svg')] flex w-8  h-8  "></span>
      </div> */}
      {/* <Carousel
        transition={{ duration: 2 }}
        className="rounded-xl top-0 h-[500px]"
        autoplay
        loop
      >
        <img
          src="https://www.abbotts-removals.co.uk/wp-content/uploads/2023/06/House-removals-in-Northampton-pp2-s.jpg"
          alt="image 1"
          className="h-full w-full object-cover "
        />
        <img
          src="https://tunisiedemenagement.com/images/preparer-vos-enfants-au-demenagement.jpg"
          alt="image 2"
          className="h-full w-full object-cover"
        />
        <img
          src="https://images.unsplash.com/photo-1518623489648-a173ef7824f3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2762&q=80"
          alt="image 3"
          className="h-full w-full object-cover"
        />
      </Carousel> */}


<Footer/>
    </div>
  );
};

export default home;
