import PrimaryButton from "../components/primaryButton";
import styles from "../login.module.css";
import Footer from "./footer.jsx";

const LandingPage = () => {
  return (
    <div className="relative bg-[#FFF7F3] h-screen">
      <div className={`flex justify-between w-screen items-center"`}>
        <div className="p-2 px-5">
          <img
            src="../../src/assets/6.png"
            className="w-16 h-16  text-2xl font-semibold whitespace-nowrap dark:text-black  "
            alt=""
          />
        </div>
        <div className="flex items-center px-2 ">
          <div className="px-5">
            <h1 className=" text-[#4B75CB] text-lg  cursor-pointer hover:border-b-2 border-[#4B75CB] ">
              Explore our services
            </h1>
          </div>
          <PrimaryButton text={"Sign Up now "} w={180} h={40} />
        </div>
      </div>

      <span className="  rounded-full w-10 h-10 bg-[#FFD9C7]  absolute left-28 top-28 "></span>
      <h1 className="text-[#233863] text-3xl mt-10 px-20 pt-10">
        We connect Movers to
        <br />
        your doorstep
      </h1>
      <div className="px-28 z-20">
        <i>
          Describe your need. <br />
          Post the request. <br />
          Choose from the bids & offers you <br />
          receive.
        </i>
      </div>
      <div className={styles.cloud_one}>
        <span className="rounded-full w-16 h-16 bg-[#FE6F2E] absolute  top-0 left-5"></span>
      </div>

      <span className="  rounded-full w-16 h-16 bg-[#FFD9C7] absolute  top-56 right-4 "></span>
      <span className="  rounded-full w-10 h-10 bg-[#FE6F2E]  absolute right-72 top-24 "></span>

      <span className="  rounded-full w-10 h-10 bg-[#FE6F2E]  absolute right-56 top-[400px]"></span>
      <span className="  rounded-full w-10 h-10 bg-[#FFD9C7]  absolute left-56 top-[400px]"></span>
      <img
        src="../../src/assets/landingpage 1 1.svg"
        alt=""
        className="w-[450px] h-[500px] absolute right-16 top-6  "
      />
      <div>
        <h1 className="text-[35px] text-center pt-28">Our Services</h1>
      </div>
      <div className="relative bg-[#FFF7F3] h-full">
        <img
          src="../../src/assets/2150709838-removebg-preview 1.svg"
          alt=""
          className="w-[450px] h-[500px] absolute left-16  "
        />
        <div className=" absolute right-[200px] top-[250px] text-[#000000] ">
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
      <Footer />
    </div>
  );
};

export default LandingPage;
