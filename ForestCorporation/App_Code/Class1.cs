using System.Data;
using System.IO;
using System.Text;
using System;
public class Convertor
{
    private string[] arrOnes = new string[] { "Zero", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine" }; private string[] arrMisc = new string[] { "", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", "Nineteen", }; private string[] arrTens = new string[] { "", "Ten", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety", };

    #region Constants
    private const string HUNDRED_TEXT = " Hundred";
    private const string THOUSAND_TEXT = " Thousand";
    private const string LAKH_TEXT = " Lakh";
    private const string AND_TEXT = " and ";

    private const string POINT_TEXT = " point ";
    private const string TOO_HIGH_TEXT = "Too high value";
    private const int ONE = 1;
    private const int TEN = 2;
    private const int HUNDRED = 3;
    private const int THOUSAND = 4;
    private const int TENTHOUSAND = 5;
    private const int LAKH = 6;
    private const int TENLAKH = 7;
    private const int MAX_ALLOWED_LENGTH = TENLAKH;
    public const int ERR_TOOLENGTH = -1;
    public const int ERR_INPUT = -2;
    public const int RET_SUCCESS = 0;
    #endregion
    public int ConvertNumberToText(string sNumber, out string sResult)
    {
        sResult = "";
        string[] str = sNumber.Split(new char[] { '.' });
        string sStrAfterDecimal = str.Length > 1 ? str[1] : "";
        string sStrBeforeDecimal = str.Length >= 1 ? str[0] : "";
        if (sStrBeforeDecimal.Length > MAX_ALLOWED_LENGTH)
        {
            sResult = TOO_HIGH_TEXT;
            return ERR_TOOLENGTH;
        }
        if (GetNuumberText(sStrBeforeDecimal, false, ref sResult) == RET_SUCCESS)
        {
            if (sStrAfterDecimal != "")
            {
                sResult += POINT_TEXT;
                if (GetNuumberText(sStrAfterDecimal, true, ref sResult) != RET_SUCCESS)
                {
                    sResult = "Error while computing..";
                    return ERR_INPUT;
                }
            }
            return RET_SUCCESS;
        }
        else
        {
            sResult = "Error while computing..";
            return ERR_INPUT;
        }
    }
    private int GetNuumberText(string str, bool isAfterDecimal, ref string retStr)
    {
        bool addAndString = false;
        try
        {
            if (isAfterDecimal && str.Length >= 1)
            {
                for (int i = 0; i < str.Length; i++)
                    retStr += arrOnes[int.Parse(str[i].ToString())] + " ";
                retStr = retStr.Remove(retStr.Length - 1);
            }
            else
            {
                while (str.Length > 0)
                {
                    switch (str.Length)
                    {
                        case ONE:
                            retStr += arrOnes[int.Parse(str[0].ToString())];
                            str = ""; break;
                        case TEN:
                            {
                                string temp = GetTwoDigitString(str);
                                if (temp != "")
                                    retStr += addAndString ? AND_TEXT + temp : temp;
                                str = "";
                            }
                            break;
                        case HUNDRED:
                            if (str[0] != '0')
                                retStr += string.Format("{0}{1}", arrOnes[int.Parse(str[0].ToString())], HUNDRED_TEXT);
                            if (str.Substring(1) != "00")
                                addAndString = true;
                            str = str.Remove(0, 1);
                            break;
                        case THOUSAND:
                            retStr += string.Format("{0}{1} ", arrOnes[int.Parse(str[0].ToString())], THOUSAND_TEXT);
                            str = str.Remove(0, 1);
                            break;
                        case TENTHOUSAND:
                            {
                                string temp = GetTwoDigitString(str.Substring(0, 2));
                                if (temp != "")
                                    retStr += string.Format("{0}{1} ", temp, THOUSAND_TEXT);
                                str = str.Remove(0, 2);
                            } break;
                        case LAKH:
                            retStr += string.Format("{0}{1} ", arrOnes[int.Parse(str[0].ToString())], LAKH_TEXT);
                            str = str.Remove(0, 1);
                            break;
                        case TENLAKH:
                            {
                                string temp = GetTwoDigitString(str.Substring(0, 2));
                                if (temp != "")
                                    retStr += string.Format("{0}{1} ", temp, LAKH_TEXT);
                                str = str.Remove(0, 2);
                            } break;

                        default:
                            break;
                    }
                }
            }
        }
        catch (Exception ex)
        {
            Console.WriteLine(ex.Message);
            return ERR_INPUT;
        }
        return RET_SUCCESS;
    }
    private string GetTwoDigitString(string str)
    {
        if (str == "00") return "";
        string retString = "";
        if (str[1] == '0')
            retString += arrTens[int.Parse(str[0].ToString())];
        else if (str[0] == '1')
            retString += arrMisc[int.Parse(str[1].ToString())];
        else
        {
            retString += arrTens[int.Parse(str[0].ToString())];
            retString += arrOnes[int.Parse(str[1].ToString())];
        } return retString;
    }
}


