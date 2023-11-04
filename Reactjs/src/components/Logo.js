import { Link as RouterLink } from 'react-router-dom';
import { Box } from '@mui/material';
import LogoImage from 'src/assets/images/logo.png'


export default function Logo() {
  const logo = (
    <Box sx={{ width: 105, height: 50, }}>
        <img src={LogoImage} alt="Govind Singh Tomar" />
    </Box>
  );


  return <RouterLink to="/">{logo}</RouterLink>;
}
