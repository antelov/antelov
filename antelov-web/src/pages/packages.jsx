import React from "react";
import Card from "../components/card";

const packages = () => {
  return (
    <div className="flex justify-center items-center gap-6 py-5">
      <Card
        title="BASIC Pack"
        price="$2,000"
        color="#D86019"
        urltop="../../src/assets/TOP 1.png"
        urlbottom="../../src/assets/BUTTOM 2.png"
      />
      <div className="mt-[-20px]">
        <Card
          title="BASIC Pack"
          price="$4,000"
          color="#173353"
          urltop="../../src/assets/TOP 2.png"
          urlbottom="../../src/assets/BUTTOM 1.png"
        />
      </div>
      <Card
        title="BASIC Pack"
        price="$10,000"
        color="#F7B500"
        urltop="../../src/assets/TOP 3.png"
        urlbottom="../../src/assets/BUTTOM 3.png"
      />
    </div>
  );
};

export default packages;
