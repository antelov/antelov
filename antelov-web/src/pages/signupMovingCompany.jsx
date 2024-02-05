import BlueInput from "../components/blueInput";
import PrimaryButton from "../components/primaryButton";
import DocumentsSubmission from "../pages/documentsSubmission";
import { useEffect, useState } from "react";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faArrowRight } from "@fortawesome/free-solid-svg-icons";
const signupMovingCompany = () => {
  const [Modal, setModal] = useState(true);
  return (
    <div className="p-2">
      <img
        src="../../src/assets/6.png"
        className="w-16 h-16  p-1 absolute right-8  "
        alt=""
      />
      <div className="flex flex-wrap  gap-20  p-10">
        <img src="../../src/assets/art2 1.svg"  className="w-[600px] h-[600px]   " />

        <div className=" w-1/3 h-screen ">
          <h1 className="font-poppins  text-[#FE6019E5] font-semibold p-4 ">
            Company information :
          </h1>
          <div>
            <BlueInput w={260} h={40} inputName="Company name" />
            <BlueInput w={260} h={40} inputName="UEN" />
            <BlueInput w={260} h={40} inputName="Company Size" />
            <BlueInput w={260} h={40} inputName="Company adress" />
            <BlueInput w={260} h={40} inputName="Company email" />
            <BlueInput w={260} h={40} inputName="Company phone number & fax" />
            <BlueInput w={260} h={40} inputName="Company website (optional)" />
          </div>

          <div className="  flex justify-end items-center  ">
            <div>
                 <div className=" flex flex-col items-center   ">
                 <div className=" cursor-pointer bg-gradient-to-r from-[#FFD700] to-[#FE6019]  w-12 h-5  flex justify-center items-center rounded-full"
                   onClick={()=>setModal(!Modal)}
                 >
                    <FontAwesomeIcon
                      icon={faArrowRight}
                      color="white"
                      size="lg"
                    />
                  </div>
                  <p className="text-[#2B478B] font-poppins w-[180px]">document submission</p>

                 </div>
             
            </div>
          </div>
        </div>
      </div>
      {Modal ? <DocumentsSubmission Modal={Modal} setModal={setModal} /> : null}
    </div>
  );
};

export default signupMovingCompany;
