import React from 'react';
import UserIcon from '@material-ui/icons/Group';
import authProvider from './authProvider';
import { UserList, UserEdit, UserCreate } from './users';
import { fetchUtils, Admin, Resource } from 'react-admin';
import simpleRestProvider from 'ra-data-simple-rest';
import dataProvider from './dataProvider';

const App = () => (
    <Admin title="My Custom Admin" authProvider={authProvider}
      dataProvider={dataProvider}
    >
        <Resource name="users" list={UserList} create={UserCreate}
         edit={UserEdit} icon={UserIcon}  />
    </Admin>
);

export default App;


