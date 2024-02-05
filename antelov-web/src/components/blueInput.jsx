const blueInput = ({ h, w, inputName ,type }) => {
  return (
    <div class=" p-4 rounded-lg">
         <div class="relative bg-inherit ">
           <input
            type="text"
            id="username"
             name="username"
            class=" bg-[#EAF3FA80] border-l-[1px] border-[#2B478BD9] peer   rounded-[10px] text-gray-200 placeholder-transparent     focus:outline-none "
             placeholder={inputName}
             style={{ height: `${h}px`, width: `${w}px` }}
           />
           <label
            for="username"
            class="absolute cursor-text left-0 -top-3 text-sm  mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown: peer-placeholder-shown:top-2 peer-focus:-top-6 peer-focus:text-sky-600 peer-focus:text-sm  pree-focus:bg-[#EAF3FA80] transition-all"
          >
              {inputName}
          </label>
       </div>
       </div>


    
  );
};

export default blueInput;




