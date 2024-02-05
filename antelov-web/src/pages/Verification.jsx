import React, { useEffect } from "react";

const Verification = () => {
  
  return (
    <div className="flex flex-col h-screen items-center justify-center  text-center">
      <img src="../../src/assets/Verification.svg" alt="" class="w-1/4" />
      <p className="font-poppins text-[#008080]">Verification pending</p>
      <span>
        Your documents are currently undergoing a thorough review. Please
        anticipate a confirmation and further instructions via email .
      </span>
      
    </div>
  );
};

export default Verification;
